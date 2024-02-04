import { CommonModule } from '@angular/common';
import { Component, EventEmitter, Output } from '@angular/core';
import { MaterialModule } from '../../material.module';

@Component({
  selector: 'app-filter',
  standalone: true,
  imports: [CommonModule, MaterialModule],
  templateUrl: './filter.component.html',
  styleUrl: './filter.component.css'
})
export class FilterComponent {

  @Output() filtersChanged = new EventEmitter<{ type: string; values: string[] }[]>();

  selectedFilters: { type: string; values: string[] }[] = [];

  filterChanged(type: string, value: string) {
    const filterIndex = this.selectedFilters.findIndex((filter) => filter.type === type);

    if (filterIndex !== -1) {
      const values = this.selectedFilters[filterIndex].values;
      const valueIndex = values.indexOf(value);

      if (valueIndex !== -1) {
        values.splice(valueIndex, 1);
      } else {

        values.push(value);
      }
    } else {
      this.selectedFilters.push({ type, values: [value] })
    }
    console.log(this.selectedFilters)
    this.filtersChanged.emit(this.selectedFilters);
  }
}
