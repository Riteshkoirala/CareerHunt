#!/home/college/Dessertation/CareerHunt/myenv/bin/python
import re
# we use NumPy for the mathmathical operation
import numpy as np
# we use pandas for data manipulation
import pandas as pd
# we are using matlab for the data visualization
import matplotlib.pyplot as plt
# we use plotly express for building interactive plots
import plotly.express as px
# we can use seaborn for statistical data visualization
import seaborn as sns
# from wordcloud import WordCloud
# we are using word clouds to visualize the word as cloud format
# from wordcloud import WordCloud

from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics.pairwise import cosine_similarity
import sys
df = pd.read_csv('../database/dataset/cleaneds_dataset.csv')

skills_input = sys.argv[1]
# Sample data

data = pd.DataFrame({
    'Job Title': df['Job Title'],
    'Key Skills': df['Key Skills']
})

skills_list = data["Key Skills"].tolist()
# TF-IDF Vectorization
# tfidf_vectorizer = TfidfVectorizer(stop_words="english")
# tfidf_matrix = tfidf_vectorizer.fit_transform(skills_list)

# from sklearn.decomposition import TruncatedSVD
# from sklearn.preprocessing import normalize
# from sklearn.metrics.pairwise import cosine_similarity
# import numpy as np
# import pandas as pd

# Load your data here

# # Create a subset of your data by randomly sampling
# sample_size = 15000  # Adjust the sample size as needed
# sampled_data = data.sample(n=sample_size, random_state=42)
#
# # Extract the 'Key Skills' from the sampled data
# sampled_skills_list = sampled_data['Key Skills'].tolist()
#
# # TF-IDF Vectorization
# tfidf_vectorizer = TfidfVectorizer(stop_words="english")
# tfidf_matrix = tfidf_vectorizer.fit_transform(sampled_skills_list)
#
# # Further reduce dimensionality with TruncatedSVD
# n_components = 50  # Adjust the number of components as needed
# svd = TruncatedSVD(n_components=n_components)
# tfidf_matrix_reduced = svd.fit_transform(tfidf_matrix)
#
# # Normalize the reduced matrix
# tfidf_matrix_reduced_normalized = normalize(tfidf_matrix_reduced)

# Compute cosine similarity on the reduced and normalized matrix
tfidf_vectorizer = TfidfVectorizer(stop_words="english")
tfidf_matrix = tfidf_vectorizer.fit_transform(skills_list)

# Step 3: Calculate cosine similarity
similarity_matrix = cosine_similarity(tfidf_matrix)
indices = pd.Series(data.index, index=data['Job Title']).drop_duplicates()

# Function to get recommendations
def jobs_recommendation_based_on_skills(input_skills, similarity=similarity_matrix, threshold=0.2):
    # Convert input skills to a single string
    input_skills_str = ' '.join(input_skills)

    # Transform input skills to a TF-IDF vector
    input_skills_vector = tfidf_vectorizer.transform([input_skills_str])

    # Calculate cosine similarity between input skills and all job skill vectors
    similarity_scores = cosine_similarity(input_skills_vector, tfidf_matrix)

    # Sort the indices of similar jobs in descending order of similarity scores
    similar_jobs_indices = similarity_scores.argsort()[0][::-1]

    # Initialize a list for recommended jobs
    recommended_jobs = []

    # Iterate through similar jobs and check if similarity score exceeds the threshold
    for idx in similar_jobs_indices:
        if similarity_scores[0][idx] > threshold:
            recommended_jobs.append(data.iloc[idx]['Job Title'])

    return recommended_jobs

# Example: Get recommendations for 'Movie 1'
# input_skills = ['sales','python']
recomm = jobs_recommendation_based_on_skills({skills_input})

print(recomm)
