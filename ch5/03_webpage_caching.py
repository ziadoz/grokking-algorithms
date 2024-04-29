# Webpage caching
cache = {}

def get_page(url):
    if url in cache:
        return cache[url]
    else:
        data = '<p>I am a webpage</p>'
        cache[url] = data
        return data

print(get_page('facebook.com/login')) # Fresh...
print(get_page('facebook.com/login')) # Cache...
print(get_page('facebook.com/contact')) # Fresh...
