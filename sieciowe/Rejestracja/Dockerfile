FROM openjdk
COPY src Logowanie2
WORKDIR Logowanie2
RUN mkdir -p  bin 
RUN javac -d bin BDObsluga.java
RUN javac -d bin RejestracjaSerwer.java
WORKDIR bin
CMD ["java", "RejestracjaSerwer"]
