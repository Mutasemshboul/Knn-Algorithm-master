import pandas as pd
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.naive_bayes import MultinomialNB

# Load the email data into a pandas dataframe
df = pd.read_csv('customer_data.csv')

# Convert the email text into a numerical feature matrix using CountVectorizer
vectorizer = CountVectorizer()
X = vectorizer.fit_transform(df['Text'])

# Split the data into features (X) and the target variable (y)
y = df['Spam']

# Train a Multinomial Naive Bayes model on the email data
model = MultinomialNB()
model.fit(X, y)

# Use the model to predict whether a new email is spam or not
new_email = "Get rich quick! Click here now!"
new_email_matrix = vectorizer.transform([new_email])

prediction = model.predict(new_email_matrix)

if prediction[0] == 1:
    print("The email is spam.")
else:
    print("The email is not spam.")
