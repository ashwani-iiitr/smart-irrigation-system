import socket
sock = socket.socket(socket.AF_INET,socket.SOCK_DGRAM)
#status of node 1
sock.sendto("o",("192.168.43.83",4210))

data,addr = sock.recvfrom(255)

print data
