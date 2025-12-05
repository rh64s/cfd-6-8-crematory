FROM node:current-alpine as build

#VOLUME ../../frontend /var/www/
WORKDIR /var/www/frontend

COPY ../../frontend/package*.json ./
RUN npm install
#EXPOSE 5173
COPY ../../frontend ./
CMD ["npm", "run", "dev", "--", "--host"]
RUN #npm run build
#
#FROM nginx:stable-alpine
#COPY --from=build /dist /usr/share/nginx/html
#
