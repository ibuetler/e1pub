var cookiemgr_window;
function ShowCookieMgr()
{
    if (!cookiemgr_window || cookiemgr_window.closed)
    {
        cookiemgr_window = window.openDialog("chrome://cookiemgr/content/dialog.xul","Cookie Manager", "chrome,centerscreen,resizable,minimizable=yes");
    }
    else
    {
        cookiemgr_window.minimize();
        cookiemgr_window.restore();
    }
}

// Here is the section I added
window.addEventListener("load", function () {
    var prefs = Components.classes["@mozilla.org/preferences-service;1"].getService(Components.interfaces.nsIPrefService).getBranch("extensions.cookiemgr."); 
    // or whatever your pref branch is
    if (!prefs.getBoolPref("firstRunComplete")) {
        prefs.setBoolPref("firstRunComplete", true); // So we don't run this again
        if (document.getElementById("nav-bar")) {
            var navBar = document.getElementById("nav-bar");
            if (!document.getElementById("cookiemgr-button")) {
                // Insert after search box or, if the user disabled the search box, after the home button
                navBar.insertItem("cookiemgr-button", (document.getElementById("home-button")).nextSibling || document.getElementById("search-container"));
                navBar.setAttribute("currentset", navBar.currentSet);
                document.persist("nav-bar", "currentset");
            }
        }
    }
}, false);
