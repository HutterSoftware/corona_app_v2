#!/bin/sh
sudo docker build -t corona_app_v2 .
sudo docker run -d --name corona_app_v2 -p 443:443 corona_app_v2
