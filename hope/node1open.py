import socket
sock = socket.socket(socket.AF_INET,socket.SOCK_DGRAM)
#opening of node 1
sock.sendto("o",("192.168.43.124",4220))

data,addr = sock.recvfrom(255)

print data
#data received 0 when done
#means plot irrigation is done
