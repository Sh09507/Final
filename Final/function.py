def hex(request):
    #CORS request handling section came from a Google Cloud Function tutorial shown in class https://cloud.google.com/functions/docs/writing/http#functions_http_cors-python
    if request.method == 'OPTIONS':
        headers = {
            'Access-Control-Allow-Origin': '*',
            'Access-Control-Allow-Methods': 'GET',
            'Access-Control-Allow-Headers': 'Content-Type',
            'Access-Control-Max-Age': '3600'
        }
    
        return ('', 204, headers)
    
    headers = {
        'Access-Control-Allow-Origin': '*'
    }
    
    #Line 17 & 18 came from professor Thackston's python example function
    #how to return a response code came from a stackoverflow question https://stackoverflow.com/questions/44353455/how-to-send-a-status-200-answering-to-a-https-post-in-python
    request_json = request.get_json()
    x = request_json.get("x")
    try:
        #Lines 21-23 came from stackoverflow https://stackoverflow.com/questions/29643352/converting-hex-to-rgb-value-in-python
        h = x.lstrip('#')
        if len(h) == 6:
            rgb = tuple(int(h[i:i+2], 16) for i in (0, 2, 4))
        else:
            return ('bad request', 400, headers)
    except:
        return ('bad request', 400, headers)
    #return formatting also came from Google Cloud function tutorial
    return (str(rgb), 200, headers)