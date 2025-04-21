export class Fence {
    // indicates the selected fence type
    // key value pair: "horde" and "Hordengatter"
    type: string[] = [];

    // costs of a single roll or element
    // unit: price per piece in users currency
    // example: 50.50
    element: number = 0;

    // length of a single roll or element
    // unit: running meter per piece
    // example: 50.0
    length: number = 0;

    // costs of posts or other kind of support
    // unit: price per piece in users currency
    // example: 3.50
    support: number = 0;

    // spacing of posts or other kind of support
    // unit: running meters
    // example: 4.0
    spacing: number = 0;

    // costs of accessories like nails for the complete fence
    // unit: price in users currency
    // example: 150.00
    accessories: number = 0;

    // sum of needed time for transportation
    // unit: number of hours
    // example: 3.50
    transportation: number = 0;

    // capacity per hour for assembly of fence 
    // unit: running meters per hour
    // example: 50
    assembly: number = 0;

    // sum of maintenance cost for the full protection area
    // unit: price per year in users currency
    // example: 500.00
    maintenance: number = 0;

    // estimated costs for disassembly of all tubes
    // unit: price in users currency
    // example: 1250.00
    disassembly: number = 0;

    // estimated cost for garbage disposal
    // unit: price in users currency
    // example: 120.00
    garbage: number = 0;

    // constructor for this class
    constructor() {}

    // calculate the sum of all costs for one runnig meter
    // costs per unit, thats why length of fence and price per hour is needed
    getSumOfCostsPerMeter(fenceLength: number, hourlyWage: number): number
    {
        var sum: number = 0;

        // add costs of a roll or an element for one running meter
        sum = this.element / this.length;

        // add for posts or other kind of support
        sum = sum + this.support / this.spacing;

        // add costs for accessories
        sum = sum + this.accessories / fenceLength;

        // add costs for transportation per running meter
        sum = sum + (this.transportation * hourlyWage) / fenceLength;

        // add costs for assembly of fence sections in one hour per running meter
        sum = sum + hourlyWage / this.assembly;

        // costs for maintenance the full protection area running meter
        // in future maintenance multiplied with number of years
        sum = sum + this.maintenance / fenceLength;

        // simplify calculation for disassemlby and garbage disposal
        sum = sum + (this.disassembly + this.garbage) / fenceLength;

        return sum;
    }
}
