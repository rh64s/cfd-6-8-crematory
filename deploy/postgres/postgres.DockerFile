FROM postgres:18-alpine

USER postgres
RUN chown postgres:postgres -R /var/lib/postgresql/data
VOLUME /var/lib/postgresql/data