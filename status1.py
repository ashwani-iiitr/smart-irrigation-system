import socket
sock = socket.socket(socket.AF_INET,socket.SOCK_DGRAM)
#status of node 1
sock.sendto("s",("192.168.43.76",4220))

data,addr = sock.recvfrom(255)

print data
#moisture data
