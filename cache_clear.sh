#!/bin/bash
sudo rm -r var/logs var/cache var/sessions
mkdir var/logs var/cache var/sessions 
sudo chown -R 777 var/cache var/logs var/sessions
sudo chmod -R 777 var/cache var/logs var/sessions


