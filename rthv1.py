import socket
sock = socket.socket(socket.AF_INET,socket.SOCK_DGRAM)
addrs = ['192.168.1.13','192.168.43.83','192.168.3.255']
ports = ['4200','4210','4230']
moist = []
moisture = 601
#counters
i=0
k=0

m = input("Select the mode (1.Auto and 2.Manual)\n")

#pings each node for their curr status
for k in range(2):
    sock.sendto("s",(addrs[k],int(ports[k])))

    data,adr= sock.recvfrom(255)
    moist[k] = data

if m==1:
    print "Auto mode"
    


elif m==2:
    print "Manual mode"
    print "Select the nodes"
    nodes = raw_input()
    #print len(nodes)
    nodes = nodes.split()
    print "Nodes selected : ",nodes

    for i in nodes:
    
        j=int(i)
        print addrs[j-1]
        print ports[j-1]
        sock.sendto("o",(addrs[j-1],int(ports[j-1])))

        data,adr= sock.recvfrom(255)
        print data
        print "Valve is closed in node "
        print j
        print "Moving on to next if any"

    #sock.sendto("p",("",))       
                

        

        
         
        
        

    


else:
    print "Wrong choice babes"
