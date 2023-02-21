FROM openjdk
COPY src Logowanie2
COPY Pliki Logowanie2
WORKDIR Logowanie2
RUN mkdir -p  bin 
RUN javac -d bin CLIClient.java
RUN javac -d bin FileManager.java
RUN javac -d bin User.java
RUN javac -d bin Cli.java
WORKDIR bin
CMD ["java", "Cli"]
