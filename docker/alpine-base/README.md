# alpine-base

A Docker image for running just about anything within a container, based on Alpine Linux.
This image belongs to a suite of images [documented here][dockeralpine].

Image size is ~13.8 MB.

## Features

This image features:

- [Alpine Linux][alpinelinux]
- [s6][s6] and [s6-overlay][s6overlay]
- [go-dnsmasq][godnsmasq]

## Versions

- `1.0.7`, `latest` [(Dockerfile)](https://github.com/ibuetler/e1pub/tree/master/docker/alpine-base/Dockerfile)


## Usage

To use this image include `FROM hackinglab/alpine-base` at the top of your `Dockerfile`. Starting from `hackinglab/alpine-base` provides you with the ability to easily start any service using s6. s6 will also keep it running for you, restarting it when it crashes.

## Acknowledge
This image is based on the work from smebberson.

[Read more about extending this image with your own services](https://github.com/smebberson/docker-alpine/tree/master/#using-services).

### DNS

Prior to v4.4, Alpine Linux did not support the `search` keyword in `resolv.conf`. This breaks many tools that rely on DNS service discovery, in particular, Kubernetes, Docker Cloud, Consul, Rancher.

To overcome these issues, `alpine-base` includes the lightweight container-only DNS server [go-dnsmasq][godnsmasq] to resolve these issues.

That means that any image extending this image will now work with [Docker Cloud service discovery and links](https://docs.docker.com/docker-cloud/apps/service-links/) and [Kubernetes service discovery](https://github.com/kubernetes/kubernetes/blob/master/docs/user-guide/services.md#dns).

In some environments, `go-dnsmasq` won't be allowed to bind to port `53`. In this instance, you can set the ENV variable `GO_DNSMASQ_RUNAS` to `root`. While not ideal, that should resolve the issue.

**Note**: despite Alpine Linux v4.4 adding support for the `search` keyword, `go-dnsmasq` has been retained for compatibility. It may or may not be included in future versions.

## Example

An example of using this image can be found in [examples/user-alpine](alpinebaseexample).

[alpinebaseexample]: https://github.com/smebberson/docker-alpine/tree/master/examples/user-alpine
[godnsmasq]: https://github.com/janeczku/go-dnsmasq
[dockeralpine]: https://github.com/ibuetler/e1pub/tree/master/docker/alpine-base
