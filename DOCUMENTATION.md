# Return codes

<details>
  <summary>App codes</summary>
  
- `97`  = Erro interno da aplicação;   *`Ex.: Erro ao renderizar a view`*
- `100` = Erro crítico da aplicação;  *`Ex.: Erro no banco de dados`*
- `125` = Erro por parte da api;   *`Ex.: API em manutenção`*
</details>

<details>
  <summary>User codes</summary>

- `7` = Erro cometido pelo usuário; *`Ex.: Uso de caracteres inválidos`*
- `10` = Sucesso para requisição de usuário;
- `5` = Um alerta para o usário; *`Ex.: Filme não encontrado`*
</details>

------------------------------------------------------------------------------------------

# Routes

#### To search some content (anime/serie/movie) `/search`

<details>
  <summary>
    <code>POST</code>
    <code>/search/{movies|series|animes}</code>
  </summary>
  
  ##### Body parameters

> | name | type | data type | content type | description |
> | ---- | ---- | --------- | ------------ | ----------- |
> | `content_name` | required | string | `application/x-www-form-urlencoded` | (anime/serie/movie) name|

  ##### Responses

> | http code | content type | description |
> | --------- | ------------ | ----------- |
> | `200` | `application/json` | `{"code": 7, "message": "Usuário não informou o nome do conteúdo"}` |
> | `200` | `application/json` | `{"code": 7, "message": "Nome do conteúdo inválido"}` |
> | `200` | `application/json` | `{"code": 125, "message": "Erro na API"}` |
> | `200` | `application/json` | `{"code": 7, "message": "Conteúdo não encontrado"}` |
> | `200` | `application/json` | `{"code": 200, "data": (animes\|series\|movies) list}` |
</details>

------------------------------------------------------------------------------------------

#### To get (anime/serie/movie) info/video file

<details>
  <summary>
    <code>GET</code>
    <code>/content/{id}/{<i>season</i>}</code>
    <code>To get info of (anime/serie/movie) choosed - (season is optional to get movie)</code>
  </summary>

  ##### URL parameters

> | name | type | data type | description |
> | ---- | ---- | --------- | ----------- |
> | `id` | required | int | (anime/serie/movie) ID |
> | `season` | *optional* | int | (anime/serie) season |

  ##### Responses

> | http code | content type | description |
> | --------- | ------------ | ----------- |
> | `200` | `application/json` | `{"code": 125, "message": "Erro na API"}` |
> | `200` | `application/json` | `{"code": 7, "message": "Conteúdo não encontrado"}` |
> | `200` | `application/json` | `{"code": 200, "data": (anime\|serie\|movie) info}` |
</details>

<details>
  <summary>
    <code>GET</code>
    <code>/watch/{type}/{video_file_id}</code>
    <code>To get video file of  (anime/serie/movie)</code>
  </summary>

  ##### URL parameters

> | name | type | data type | description |
> | ---- | ---- | --------- | ----------- |
> | `type` | required | string | Video content type  - `only (movie\|serie)` |
> | `video_file_id` | required | int | Video file ID |

  ##### Responses

> | http code | content type | description |
> | --------- | ------------ | ----------- |
> | `404` | `application/json` | `{"message": "Rota não encontrada"}` |
> | `200` | `application/json` | `{"code": 7, "message": "Vídeo não encontrado"}` |
> | `200` | `application/json` | `{"code": 200, "data": (anime\|serie\|movie) video files link}` |
</details>

<br>

> [!WARNING]
> Using the `/watch` route, it is recommended to pay careful attention to the `type`, as a `video_file_id` for a movie should not be used with type `series`: this results in an unqualified response, namely, `{"code": 7, "message": "Vídeo não encontrado"}`.