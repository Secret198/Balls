from flask import Flask, jsonify

app = Flask(__name__)

@app.route('/')
def test():
    response = jsonify({"message": "Hello"})
    response.headers["Access-Control-Allow-Origin"] = "*"
    
    return response 

if __name__ == "__main__":
    app.run(debug=True)