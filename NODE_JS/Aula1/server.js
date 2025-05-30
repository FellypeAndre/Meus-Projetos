import express from 'express';
import dotenv from 'dotenv';
import publicRoutes from './routes/public.js';
import mongoose from 'mongoose'

dotenv.config();


const app = express();
const PORT = 3000;

const connetDB = async () =>{
    try {
         await mongoose.connect(process.env.MONGO_URI);
    console.log("conectado ao MongoDB");
    } catch (error) {
        console.log("Deu erro ao conectar com");
        
    }
} 

connetDB();

app.use(express.json())

app.listen(3000, () => console.log("Servidor rodando "))

// app.use('/usuário', publicRoutes)

app.listen(PORT, () => console.log(`O SERVIDOR ESTÁ RODANDO NA PORTA ${PORT}`))

