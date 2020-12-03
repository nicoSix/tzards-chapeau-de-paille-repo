FROM nginx:latest
RUN rm /etc/nginx/nginx.conf
WORKDIR /usr/var/share
COPY . .
RUN pwd
RUN ls -la
RUN ls -la config
RUN ls -la dist
RUN mv "/usr/var/share/config/nginx.conf" "/etc/nginx/nginx.conf"
RUN cp -rf "/usr/var/share/dist" "/usr/share/nginx/html/"
RUN cp "/usr/var/share/index.html" "/usr/share/nginx/html/"
#RUN cp -rf "/usr/var/share/public" "/usr/share/nginx/html/"
RUN ls /usr/share/nginx/html
RUN cat /usr/share/nginx/html/50x.html
EXPOSE 80 443

#CMD service nginx start

#WORKDIR /usr/app
#COPY . .
#RUN ls
#RUN ["sudo", "cp", "./nginx.conf", "/etc/nginx/nginx.config"]
#RUN ls 
#EXPOSE 8080