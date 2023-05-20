CREATE DATABASE [If NOT EXISTS] PrestigeData;
CREATE TABLE [If NOT EXISTS] Usuarios( id int NOT NULL PRIMARY KEY IDENTITY,
                position int,
                artist_name VARCHAR(100) NOT NULL,
                song_name VARCHAR(100) NOT NULL,
                days int,
                top_10 int,
                peak_position int,
                peak_position_time VARCHAR(100) NOT NULL ,
                peak_streams int,)

