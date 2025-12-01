FROM node:current-alpine as build

RUN apk update && apk add bash

WORKDIR /var/www/front
COPY package*.json ./
COPY . .