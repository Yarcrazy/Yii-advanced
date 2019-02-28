"use strict";

var websocketPort = wsPort ? wsPort : 8080,
  conn = new WebSocket('ws://localhost:' + websocketPort),
  idMessages = 'chatMessages';

conn.onopen = function(e) {
  console.log("Connection established!");
};

conn.onerror = function(e) {
  console.log("Connection fail!");
};

conn.onmessage = function(e) {
  document.getElementById(idMessages).value = e.data + '\n' + document.getElementById(idMessages).value;
  console.log(e.data);
};