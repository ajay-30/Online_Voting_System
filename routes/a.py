n=6
l=[1,2,3,4]
c=0
flag=0
while True:
    flag=0
    for i in range(n-1):
        try:
            if (l[i]%2==0 and l[i+1]%2==0) or (l[i]%2!=0 and l[i+1]%2!=0):
                x=l[i]*l[i+1]
                l.pop(i)
                l.pop(i)
                l.insert(i,x)
                c+=1
                flag=1
                break
        except:
            break
    if flag==0:
        break
print(c)