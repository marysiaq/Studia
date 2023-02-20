FROM openjdk
COPY src APIGateway2
WORKDIR APIGateway2

RUN mkdir -p  bin 
RUN javac -d bin APi/MultiServer.java
RUN javac -d bin APi/ServerConnection.java

WORKDIR bin
CMD ["java", "APi.MultiServer"]
