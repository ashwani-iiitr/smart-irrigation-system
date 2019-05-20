import socket
sock = socket.socket(socket.AF_INET,socket.SOCK_DGRAM)

sock.sendto("k",("192.168.43.124",4230)))
