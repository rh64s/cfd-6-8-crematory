FROM node:current-alpine as build

RUN apk update && apk add bash
RUN useradd -ms /bin/bash admin
RUN mkdir /var/www && mkdir /var/www/front
#RUN #mount type=bind,src="../../frontend",dst="/var/www/front"
COPY ../../frontend /var/www/front
WORKDIR /var/www/front
RUN chown -R admin:admin /var/www/frontend
USER admin
RUN npm install
ENV PORT 5173
EXPOSE $PORT
EXPOSE 5173:5173
CMD ["npm", "run", "dev"]