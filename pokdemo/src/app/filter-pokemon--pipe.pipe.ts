import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'filterPokemonPipe', pure:false
})
export class FilterPokemonPipePipe implements PipeTransform {

  transform(pokemons: any[], property?: string, searchString?: string): any {
    if(typeof searchString == 'undefined'){
      return pokemons;
    }
    else if (typeof pokemons !== 'undefined' && typeof property !== 'undefined') {
      return pokemons.filter((pokemons) => {
        return pokemons[property].toLowerCase().indexOf(searchString.toLowerCase()) !== -1;
      });
    } else {
      return [];
    }
  }

}
