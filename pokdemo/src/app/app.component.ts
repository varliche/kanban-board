import { Component } from '@angular/core';
import { Pokemon } from './pokemon';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'pokdemo';
  id: string ='';
  pokes : Pokemon[] = [];
  selectedPokeId : '' | undefined;
  searchPokeName = '';

  constructor() {
    this.pokes.push(new Pokemon('1', 'pikachu'));
    this.pokes.push(new Pokemon('2', 'jojo'));
    }
    ngOnInit() : void{}
    go(){
     console.log(this.selectedPokeId);
    }
}
