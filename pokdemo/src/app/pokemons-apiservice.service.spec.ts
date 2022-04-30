import { TestBed } from '@angular/core/testing';

import { PokemonsAPIServiceService } from './pokemons-apiservice.service';

describe('PokemonsAPIServiceService', () => {
  let service: PokemonsAPIServiceService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(PokemonsAPIServiceService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
