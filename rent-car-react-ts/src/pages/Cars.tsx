import { useEffect, useState } from "react";
import Card from "../components/Card";

interface carsProps {
    id: number,
    name: string,
    type: string,
    manufacture: string,
    plat: string,
    price: number,
    description: string,
    created_at: string,
    updated_at: string,
    car_photo: string
}

export default function Cars() {
    const [cars, setCars] = useState<carsProps[]>([]);

    const getCars = async () => {
        try {
            const res = await fetch('http://backend-lks.kazukikun.space/a1/car/show');
            const result = await res.json();

            return result;
        } catch(error) {
            console.error(error);
            throw error;
        }
    }

    useEffect(() => {
        getCars().then(data => {
            setCars(data.cars);
        }).catch(err => {
            console.error(err);
        })
    }, [setCars]);

    return (
        <div className="car">
        <h2>Cars</h2>
        <p>Rent your car now!</p>
        <div className="car-list">
            {cars.map((car, index) => (
                <Card 
                key={index}
                image={car.car_photo}
                title={car.name}
                price={car.price}
                />
            ))}
            {/* <Card 
                image="https://www.topgear.com/sites/default/files/cars-car/image/2023/11/TopGear%20-%20Tesla%20Model%203%20-%20Facelift%20-1.jpg"
                title="Tesla model 3"
                price={20000}
            />
            <Card 
                image="https://www.topgear.com/sites/default/files/cars-car/image/2023/11/TopGear%20-%20Tesla%20Model%203%20-%20Facelift%20-1.jpg"
                title="Tesla model 3"
                price={20000}
            />
            <Card 
                image="https://www.topgear.com/sites/default/files/cars-car/image/2023/11/TopGear%20-%20Tesla%20Model%203%20-%20Facelift%20-1.jpg"
                title="Tesla model 3"
                price={20000}
            />
            <Card 
                image="https://www.topgear.com/sites/default/files/cars-car/image/2023/11/TopGear%20-%20Tesla%20Model%203%20-%20Facelift%20-1.jpg"
                title="Tesla model 3"
                price={20000}
            />
            <Card 
                image="https://www.topgear.com/sites/default/files/cars-car/image/2023/11/TopGear%20-%20Tesla%20Model%203%20-%20Facelift%20-1.jpg"
                title="Tesla model 3"
                price={20000}
            />
            <Card 
                image="https://www.topgear.com/sites/default/files/cars-car/image/2023/11/TopGear%20-%20Tesla%20Model%203%20-%20Facelift%20-1.jpg"
                title="Tesla model 3"
                price={20000}
            /> */}
        </div>
    </div>
    );
}