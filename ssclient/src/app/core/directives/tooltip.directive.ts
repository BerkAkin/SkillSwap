import { Directive, ElementRef, HostListener, Input } from '@angular/core';

@Directive({
  selector: '[appTooltipDirective]',
  standalone: true,
})
export class TooltipDirective {
  @Input() appTooltipDirective = '';

  private toolTip!: HTMLElement;

  constructor(private elementRef: ElementRef) { }

  @HostListener('mouseenter')
  show() {
    this.toolTip = document.createElement('div');
    this.toolTip.innerText = this.appTooltipDirective;

    this.toolTip.classList.add(
      'absolute',
      'bg-gray-700',
      'text-white',
      'text-sm',
      'px-2',
      'py-1',
      'rounded',
      'shadow-lg',
      'z-50'
    );

    this.elementRef.nativeElement.parentElement.appendChild(this.toolTip);
  }

  @HostListener('mouseleave')
  hide() {
    this.toolTip?.remove();
  }
}
