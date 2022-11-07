-- Drop database if exists
DROP DATABASE IF EXISTS databaseName;

-- Create database
CREATE DATABASE databaseName;

-- Use database
USE databaseName;

CREATE USER 'userName'@'localhost' IDENTIFIED BY 'password';
GRANT INSERT, UPDATE, DELETE, SELECT on databaseName.* TO 'userName'@'localhost';

CREATE TABLE pluginsTable 
(
    pluginID INT NOT NULL AUTO_INCREMENT, 
    pluginUploadDate DATE NOT NULL, 
    pluginName VARCHAR(50) CHARACTER SET utf8 NOT NULL, 
    pluginDescription VARCHAR(255) CHARACTER SET utf8 NOT NULL, 
    pluginVersions VARCHAR(14) CHARACTER SET utf8 NOT NULL DEFAULT '1.8.9 - 1.19.2',
    pluginDownloads INT NOT NULL DEFAULT 0, 
    pluginViews INT NOT NULL DEFAULT 0, 
    pluginLink VARCHAR(255) CHARACTER SET utf8 NOT NULL DEFAULT 'https://computerwolf.com/webprojects/MC-Setups/dl/example_plugin.jar', 
    pluginEnabled BOOLEAN NOT NULL DEFAULT true,
    PRIMARY KEY (pluginID)
);