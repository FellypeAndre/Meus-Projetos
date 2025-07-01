package com.exemplo.servlet;

import java.io.File;
import java.io.IOException;
import java.nio.file.Files;
import java.nio.file.StandardCopyOption;

import javax.servlet.ServletException;
import javax.servlet.annotation.MultipartConfig;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.Part;

@WebServlet("/upload")
@MultipartConfig
public class UploadServlet extends HttpServlet {
    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        Part filePart = request.getPart("imagem");
        String nomeArquivo = filePart.getSubmittedFileName();

        String caminhoUploads = getServletContext().getRealPath("/") + "uploads";
        File pastaUpload = new File(caminhoUploads);
        if (!pastaUpload.exists()) pastaUpload.mkdirs();

        File caminhoImagem = new File(pastaUpload, nomeArquivo);
        Files.copy(filePart.getInputStream(), caminhoImagem.toPath(), StandardCopyOption.REPLACE_EXISTING);

        request.setAttribute("imagem", "uploads/" + nomeArquivo);
        request.getRequestDispatcher("exibirImagem.jsp").forward(request, response);
    }
}
