import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class PokemonsAPIServiceService {

  constructor( private http: HttpClient ) {  }
  
  getPokemons() {
    this.http.get('https://pokeapi.co/api/v2/pokemon/').subscribe((data) => console.log(data));

  }
}
