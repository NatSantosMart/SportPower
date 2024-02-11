export interface Order {
    id?: any
    status: string;
    delivery_date: string;
    request_date: string;
    total_price: number;
    client_dni: string;
}