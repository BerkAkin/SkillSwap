import { Component } from '@angular/core';
import { RouterLink } from '@angular/router';
import { Brand } from '../brand/brand';
import { ClickableComponent } from '../../features/general/components/clickable-component/clickable-component';


@Component({
  selector: 'app-footer',
  standalone: true,
  imports: [RouterLink, Brand, ClickableComponent,],
  templateUrl: './footer.html',
  styleUrl: './footer.css',
})
export class Footer { }
