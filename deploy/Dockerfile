FROM node:25-alpine3.21 as build
WORKDIR /var/www/front
COPY ../frontend .
COPY ../frontend/package.json package.json
RUN npm install
RUN npm run dev
EXPOSE 80
#FROM nginx:stable-alpine
#COPY nginx.conf /etc/nginx/nginx.conf
#EXPOSE 80