#!/bin/bash

cd docker && php DockerTableCreator.php

cd .. && php -S 0.0.0.0:8000 -t ./src
