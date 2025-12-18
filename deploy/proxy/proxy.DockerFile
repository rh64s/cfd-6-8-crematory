FROM node:current-alpine as build

WORKDIR /var/www/frontend

COPY ../../frontend/package*.json ./
RUN npm install
COPY ../../frontend ./
CMD ["npm", "run", "dev", "--", "--host"]
RUN #npm run build
