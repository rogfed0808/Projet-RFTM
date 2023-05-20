import pandas as pd
from dash import Dash
from dash import dcc as dcc
from dash import html as html
from dash.dependencies import Input, Output, State
import plotly.graph_objects as go
import plotly.express as px
from dash import no_update

def get_info(Tournament):
    dico = {"Halle": {"Continent": "Europe", "ISO_Alpha": "DEU", "Country": "Germany"},
            "Wimbledon": {"Continent": "Europe", "ISO_Alpha": "GBR", "Country": "United Kingdom"},
            "Doha": {"Continent": "Asia", "ISO_Alpha": "QAT", "Country": "Qatar"},
            "Geneva": {"Continent": "Europe", "ISO_Alpha": "CHE", "Country": "Switzerland"},
            "Roland Garros": {"Continent": "Europe", "ISO_Alpha": "FRA", "Country": "France"},
            "Australian Open": {"Continent": "Oceania", "ISO_Alpha": "AUS", "Country": "Australia"},
            "Tour Finals": {"Continent": "Europe", "ISO_Alpha": "GBR", "Country": "United Kingdom"},
            "Miami Masters": {"Continent": "Americas", "ISO_Alpha": "USA", "Country": "United States"},
            "Basel": {"Continent": "Europe", "ISO_Alpha": "CHE", "Country": "Switzerland"},
            "Madrid Masters": {"Continent": "Europe", "ISO_Alpha": "ESP", "Country": "Spain"},
            "Indian Wells Masters": {"Continent": "Americas", "ISO_Alpha": "USA", "Country": "United States"},
            "Shanghai Masters": {"Continent": "Asia", "ISO_Alpha": "CHN", "Country": "China"},
            "Cincinnati Masters": {"Continent": "Americas", "ISO_Alpha": "USA", "Country": "United States"},
            "US Open": {"Continent": "Americas", "ISO_Alpha": "USA", "Country": "United States"},
            "Rome Masters": {"Continent": "Europe", "ISO_Alpha": "ITA", "Country": "Italia"},
            "Dubai": {"Continent": "Asia", "ISO_Alpha": "ARE", "Country": "United Arab Emirates"},
            "Rotterdam": {"Continent": "Europe", "ISO_Alpha": "NLD", "Country": "Netherlands"},
            "Paris Masters": {"Continent": "Europe", "ISO_Alpha": "FRA", "Country": "France"},
            "Stuttgart": {"Continent": "Europe", "ISO_Alpha": "DEU", "Country": "Germany"},
            "Canada Masters": {"Continent": "Americas", "ISO_Alpha": "CAN", "Country": "Canada"}
           }
    return dico.get(Tournament)



app = Dash(__name__)
app.config.suppress_callback_exceptions = True

app.layout = html.Div(children=[ html.H1('Dashboard: rogerfedererthemaster.com', style={'textAlign': 'center', 'color': '#000000','font-size': 40}),
                                
                                html.Br(),
                                html.Br(),

                                dcc.Graph(figure={}, id='plot-1'),
                                dcc.Graph(figure={}, id='plot-2'),
                                dcc.Graph(figure={}, id='plot-3'),
                                dcc.Graph(figure={}, id='plot-4'),
                                dcc.Graph(figure={}, id='plot-5'),
                                dcc.Graph(figure={}, id='plot-6'),
                                dcc.Graph(figure={}, id='plot-7'),
                                dcc.Graph(figure={}, id='plot-8'),

                                html.Div(["Année : ",
                                          dcc.Input(id='input-year', value='2022', type='number', style={'height':'50px', 'font-size': 35}),
                                          ], style={'font-size': 40}),
                                dcc.Graph(figure={}, id='plot-9'),

                                dcc.Graph(figure={}, id='plot-10'),                         

                                ])

@app.callback( Output(component_id='plot-1', component_property='figure'),
               Output(component_id='plot-2', component_property='figure'),
               Output(component_id='plot-3', component_property='figure'),
               Output(component_id='plot-4', component_property='figure'),
               Output(component_id='plot-5', component_property='figure'),
               Output(component_id='plot-6', component_property='figure'),
               Output(component_id='plot-7', component_property='figure'),
               Output(component_id='plot-8', component_property='figure'),
               Output(component_id='plot-9', component_property='figure'),
               Output(component_id='plot-10', component_property='figure'),

               Input(component_id='input-year', component_property='value'))





def get_graph(year):
    df = pd.read_csv("/Users/allisterkohn/Desktop/RFTM/Webscraping/Matches.csv")


    df1 = df[["Tournament", "Surface", "RF Win"]].groupby(['Tournament', "Surface"]).sum().sort_values("RF Win", ascending=False)
    df1 = df1.head(10).reset_index()
    fig1 = px.histogram(df1, x='Tournament', y = 'RF Win', color="Surface", text_auto=True).update_xaxes(categoryorder='total descending')
    fig1.update_layout(title="10 tournois les plus fructueux", xaxis_title="Tournois", yaxis_title="Nombre de victoires")

    df2 = df[["Adversaire", "Total Points"]].groupby(['Adversaire']).sum().sort_values("Total Points", ascending=True)
    df2 = df2.tail(10).reset_index()
    fig2 = px.histogram(df2, x='Adversaire', y = 'Total Points', text_auto=True)
    fig2.update_layout(title="Nombre total de points joués par adversaire", yaxis_title="Nombre total de points joués")

    df3 = df[['Year', 'RF Win']].groupby("Year").sum().reset_index()
    fig3 = px.line(df3, x='Year', y = 'RF Win', markers=True)
    fig3.update_layout(title="Nombre de victoires par année", xaxis_title="Année", yaxis_title="Nombre de victoires")

    df4 = df[['Tournament', 'Round', 'RF Win']].groupby(["Tournament", "Round"]).sum().reset_index()
    df4 = df4.loc[df4['Tournament']=='Wimbledon'].reset_index(drop=True)
    fig4 = px.pie(df4, values='RF Win', names='Round', title='Part des matchs gagnés à Wimbledon')

    df5 = df[['Date', 'Year', 'Surface', 'Month', 'RF Win']]
    fig5 = px.pie(df5, values='RF Win', names='Surface', title='Part de victoires par type de surface')

    df6 = df['Decompte ATP'].value_counts()
    df6 = df6.head(11)
    df6 = df6.iloc[1:]
    df6 = df6.to_frame()
    df6 = df6.reset_index()
    df6 = df6.rename(columns={"index": "Joueur"})
    fig6 = px.histogram(df6, x='Joueur', y = 'Decompte ATP', text_auto=True)
    fig6.update_layout(title="Joueurs ayant le plus battu Roger", yaxis_title = "Nombre de fois")

    df7 = df[['Adversaire', 'RF Win']].groupby("Adversaire").sum().sort_values("RF Win", ascending=False)
    df7 = df7.reset_index()
    df7 = df7.head(10)
    fig7 = px.histogram(df7, x='Adversaire', y = 'RF Win', text_auto=True)
    fig7.update_layout(title="Joueurs les plus battus par Roger", yaxis_title = "Nombre de fois")

    df8 = df[['Year', 'Aces', 'Double Faults']].groupby("Year").sum()
    df8 = df8.iloc[2:]
    df8 = df8.reset_index()
    fig8 = px.bar(df8, x='Year', y = ['Aces', "Double Faults"], text_auto=True)
    fig8.update_layout(title="Aces & Double Fautes par année", xaxis_title = "Année", yaxis_title = "Nombre", barmode='group')

    df9 = df[["Date", "Year", "Tournament", "RF Win"]]
    df9 = df9.groupby(["Year", "Tournament", "Date"])["RF Win"].sum()
    df9 = df9.reset_index()
    df9 = df9.sort_values("Date", ascending=True)
    df9 = df9[df9['Year']==year]
    fig9 = px.bar(df9, x='Tournament', y = "RF Win", text_auto=True)
    fig9.update_layout(title="Résultats sur l'année", xaxis_title = "Tournois", yaxis_title = "Nombre de victoires")

    df10 = df[['Year', 'Tournament', 'RF Win']]
    df10 = df10.groupby(['Tournament', 'Year']).sum().reset_index()
    df10 = df10.sort_values('Year', ascending=False).reset_index(drop=True)
    df10 = df10[df10["Year"] >= 2017]
    df10 = df10.drop(df10[df10['Tournament'] == 'Laver Cup'].index)
    df10['Continent'] = df10['Tournament'].apply(lambda x: get_info(x)['Continent'])
    df10['iso_alpha'] = df10['Tournament'].apply(lambda x: get_info(x)['ISO_Alpha'])
    df10['country'] = df10['Tournament'].apply(lambda x: get_info(x)['Country'])
    fig10 = px.scatter_geo(df10, locations="iso_alpha", color="Continent", hover_name="country", size="RF Win", animation_frame="Year", projection="natural earth")

    return fig1, fig2, fig3, fig4, fig5, fig6, fig7, fig8, fig9, fig10

if __name__ == '__main__':
    app.run_server()