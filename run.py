from flask import Flask
from flask import render_template
app = Flask(__name__)

@app.route('/')
def first():
    return render_template('home.html')

@app.route('/register')
def second():
    return render_template('register.html')

@app.route('/help')
def third():
    return render_template('help.html')
    
@app.route('/faq')
def fourth():
    return render_template('faq.html')

@app.route('/posts')
def fifth():
    return render_template('posts.html')

@app.route('/create')
def sixth():
    return render_template('create.html')

if __name__ == '__main__':
    app.debug = True
    app.run()