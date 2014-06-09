import urllib2

f = urllib2.urlopen('http://hmsc.oregonstate.edu/weatherproject/archive/current/HMSC_current.dat')
for lines in f.readlines():
    pass
    last = lines
print last
