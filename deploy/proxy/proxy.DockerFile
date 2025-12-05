FROM node:current-alpine

WORKDIR /var/www/frontend

COPY ../../frontend/package* ./
RUN npm install
COPY ../../frontend ./
EXPOSE 5173
CMD ["npm", "run", "dev", "--", "--host"]