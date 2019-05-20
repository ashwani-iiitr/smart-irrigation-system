import socket
sock = socket.socket(socket.AF_INET,socket.SOCK_DGRAM)
#opening of node 1
sock.sendto("c",("192.168.43.76",4220))



#data received 0 when done
#means plot irrigation is done
