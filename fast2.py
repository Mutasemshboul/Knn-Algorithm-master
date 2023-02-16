from fastapi import FastAPI
import uvicorn
import pandas as pd
from pydantic import BaseModel
import json

from sklearn.metrics.pairwise import cosine_similarity

app = FastAPI()

class Items(BaseModel):
    it:int


class Rating(BaseModel):
    ID:Items



dataset={
        1: {'Item_1': 2,
           'Item_3': 3},
    
        2: {'Item_1': 5,
                    'Item_2': 2},
    
        3: {'Item_1': 3,
                   'Item_2': 3,
                   'Item_3': 1},
    
        4: {'Item_2': 2,
                   'Item_3': 3}
                  }

def upfilejso():
    with open('data.json', 'r') as f:
        # Load the JSON data from the file
        global dataset
        dataset = json.load(f)

dataset_df=pd.DataFrame(dataset)
dataset_df.fillna("Not Seen Yet",inplace=True)
dataset_df

# custom function to create unique set of web series

def unique_items():
    unique_items_list = []
    for person in dataset.keys():
        for items in dataset[person]:
            unique_items_list.append(items)
    s=set(unique_items_list)
    unique_items_list=list(s)
    return unique_items_list

# custom function to implement cosine similarity between two items i.e. web series

def item_similarity(item1,item2):
    both_rated = {}
    for person in dataset.keys():
        if item1 in dataset[person] and item2 in dataset[person]:
            both_rated[person] = [dataset[person][item1],dataset[person][item2]]

    #print(both_rated)
    number_of_ratings = len(both_rated)
    if number_of_ratings == 0:
        return 0

    item1_ratings = [[dataset[k][item1] for k,v in both_rated.items() if item1 in dataset[k] and item2 in dataset[k]]]
    item2_ratings = [[dataset[k][item2] for k, v in both_rated.items() if item1 in dataset[k] and item2 in dataset[k]]]
    #print("{} ratings :: {}".format(item1,item1_ratings))
    #print("{} ratings :: {}".format(item2,item2_ratings))
    cs = cosine_similarity(item1_ratings,item2_ratings)
    return cs[0][0]


#print("Cosine Similarity:: ",item_similarity('Panchayat','Special Ops'))


#custom function to check most similar items 

def most_similar_items(target_item):
    un_lst=unique_items()
    scores = [(item_similarity(target_item,other_item),target_item+" --> "+other_item) for other_item in un_lst if other_item!=target_item]
    scores.sort(reverse=True)
    return scores

#print(most_similar_items('Panchayat'))

#custom function to filter the seen movies and unseen movies of the target user

def target_movies_to_users(target_person):
    target_person_movie_lst = []
    unique_list =unique_items()
    for movies in dataset[target_person]:
        target_person_movie_lst.append(movies)

    s=set(unique_list)
    recommended_movies=list(s.difference(target_person_movie_lst))
    a = len(recommended_movies)
    if a == 0:
        return 0
    return recommended_movies,target_person_movie_lst


# function check


#unseen_movies,seen_movies=target_movies_to_users('Ritvik')

#dct = {"Unseen Movies":unseen_movies,"Seen Movies":seen_movies}
#pd.DataFrame(dct)




def recommendation_phase(target_person):
    if target_movies_to_users(target_person=target_person) == 0:
        print(target_person, "has seen all the movies")
        return -1
    not_seen_movies,seen_movies=target_movies_to_users(target_person=target_person)
    seen_ratings = [[dataset[target_person][movies],movies] for movies in dataset[target_person]]
    weighted_avg,weighted_sim = 0,0
    rankings =[]
    for i in not_seen_movies:
        for rate,movie in seen_ratings:
            item_sim=item_similarity(i,movie)
            weighted_avg +=(item_sim*rate)
            weighted_sim +=item_sim
        weighted_rank=weighted_avg/weighted_sim
        rankings.append([weighted_rank,i])

    rankings.sort(reverse=True)
    return rankings


@app.get("/get-item/{ID}")
def get_itme(ID:str):
    upfilejso()
    l= []
    #tp = input().title()
    if ID in dataset.keys():
        a=recommendation_phase(ID)
    if a != -1:
        print("Recommendation Using Item based Collaborative Filtering:  ")
        for w,m in a:
            return m
            l.append([m,w])
            print(m," ---> ",w)
    else:
        print("Person not found in the dataset..please try again")
    return l
    


uvicorn.run(app)
