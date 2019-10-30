import socket
import sys
from _thread import *


HOST = '0.0.0.0'  # Standard loopback interface address (localhost)
PORT = 777        # Port to listen on (non-privileged ports are > 1023)

s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
print("Socket created on port 777")

try:
    s.bind((HOST, PORT))
except socket.error:
    print("Could not bind port")
    sys.exit()

s.listen(10)


def client_thread(conn):
    state = 0
    #sequence = "1234" # short sequence for testing
    sequence = "213421312312331312312312312232321321321323123122312312312312" # 60 chars. Medium length challenge 
    #sequence = "4211411233133311344133222112211133323322432313233343232411244432221232443214211413112314233214211313324443433142224221233131233441131113313422411421133412313332343341422242234143114124434233412343241211113333224142441121141141434311134241443112411332241242341434442441124113212213332114344144311434312331234421224231233431211214333223424214232131423241211433244224434324421212121244434443143313414113241333342441433413332334344311231324322243132112341313424331442111122132321133233331221133212132213141221422121314222434141422244114324324211412323424111241133223211214232133313442112321443412341132331222233311413212112343241144433121132414124421133213114334122224344123313434131331222343124143434341213143134212334121134311311423114121432412222242214242111434144333213242144414314141442242322434241231421223212212413223421341231322123234231444221111433441243421324421333423432414113323412414113222124141241441422111444411131441323234344142212331443322343242143131133422123332444222131314323132111241" # 1000 charcater long sequence. For if you want to force them to automate answer.
    welcome_message ="""
Welcome to the mastermind challenge 

This challenge requires you to press coloured buttons in a specific sequence.
If you press the right you will advance to the next round of the challenge.
If the buttons are pressed in the wrong order you will have to start over.


  __  __           _            __  __ _           _  
 |  \/  |         | |          |  \/  (_)         | | 
 | \  / | __ _ ___| |_ ___ _ __| \  / |_ _ __   __| | 
 | |\/| |/ _` / __| __/ _ \ '__| |\/| | | '_ \ / _` | 
 | |  | | (_| \__ \ ||  __/ |  | |  | | | | | | (_| | 
 |_|  |_|\__,_|___/\__\___|_|  |_|  |_|_|_| |_|\__,_| 
                                                      


To press the Red button, Enter the value [1]
To press the Blue button, Enter the value [2]
To press the Green button, Enter the value [3]
To press the Yellow button, Enter the value [4]
To Exit this service type the value [0]
"""

    conn.send(welcome_message.encode())

    while True:
        data = conn.recv(1)
        reply = ""

        answer = data.decode()
        print(answer)
        if answer == "0":
            reply += "Goodbye. Thanks for playing\r\n"
            conn.sendall(reply.encode())
            break
        elif answer == sequence[state]:
            state+=1
            if state == len(sequence):
                reply += """

   _____                            _         _       _   _                  
  / ____|                          | |       | |     | | (_)                 
 | |     ___  _ __   __ _ _ __ __ _| |_ _   _| | __ _| |_ _  ___  _ __  ___  
 | |    / _ \| '_ \ / _` | '__/ _` | __| | | | |/ _` | __| |/ _ \| '_ \/ __| 
 | |___| (_) | | | | (_| | | | (_| | |_| |_| | | (_| | |_| | (_) | | | \__ \ 
  \_____\___/|_| |_|\__, |_|  \__,_|\__|\__,_|_|\__,_|\__|_|\___/|_| |_|___/ 
                     __/ |                                                   
                    |___/                                                    


The Final flag is :P"#^>y<8yJg/RU3$

"""
                reply += "Goodbye. Thanks for playing\r\n"
                conn.sendall(reply.encode())
                break
            else:
                reply += "Your answer is correct. You will now progress to the " + str(state+1) +" round of the challenge. Reach level " + str(len(sequence)) + " to complete this challenge"

        elif answer in sequence:
            state = 0
            reply = "Sorry your answer was incorrect and you will be returned to round 1 of this challenge"
        else:
            continue
        reply+= "\r\n#################################################################\r\n"
        conn.sendall(reply.encode())
    print("Connection closed")
    conn.close()


while True:
    conn, addr = s.accept()
    start_new_thread(client_thread, (conn,))
    s.close
