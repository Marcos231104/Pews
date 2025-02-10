:root {
    --color-primary: #2196F3;
    --color-primary-dark: #1976D2;
    --color-primary-light: #64B5F6;
    --color-white: #ffffff;
    --color-gray: #f5f5f5;
    --color-text: #333333;
    --shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    --transition: all 0.3s ease;
}

/* Reset e estilos base */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #E3F2FD, #BBDEFB);
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

/* Container principal */
.form-container {
    width: 100%;
    max-width: 600px;
    background: var(--color-white);
    border-radius: 20px;
    box-shadow: var(--shadow);
    padding: 40px;
}

/* Header */
.header {
    text-align: center;
    margin-bottom: 40px;
    padding-bottom: 20px;
    border-bottom: 2px solid var(--color-gray);
}

.header i {
    font-size: 3.5rem;
    color: var(--color-primary);
    margin-bottom: 15px;
    display: inline-block;
}

.header h1 {
    color: var(--color-text);
    font-size: 1.8rem;
    margin-bottom: 10px;
}

.header p {
    color: #666;
    font-size: 1rem;
}

/* Grid do formulário */
.form-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    margin-bottom: 30px;
}

/* Grupos de formulário */
.form-group {
    position: relative;
}

.form-group.full-width {
    grid-column: 1 / -1;
}

label {
    display: block;
    margin-bottom: 8px;
    color: var(--color-text);
    font-weight: 500;
}

label i {
    margin-right: 8px;
    color: var(--color-primary);
}

input, select, textarea {
    width: 100%;
    padding: 12px;
    border: 2px solid var(--color-gray);
    border-radius: 8px;
    font-size: 1rem;
    transition: var(--transition);
    background-color: var(--color-white);
}

input:focus, select:focus, textarea:focus {
    outline: none;
    border-color: var(--color-primary);
    box-shadow: 0 0 0 3px rgba(33, 150, 243, 0.1);
}

/* Botões */
.button-group {
    display: flex;
    gap: 15px;
    justify-content: flex-end;
}

button {
    padding: 12px 24px;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: var(--transition);
}

button i {
    font-size: 1.2rem;
}

.btn-primary {
    background-color: var(--color-primary);
    color: var(--color-white);
}

.btn-primary:hover {
    background-color: var(--color-primary-dark);
    transform: translateY(-2px);
}

.btn-secondary {
    background-color: var(--color-gray);
    color: var(--color-text);
}

.btn-secondary:hover {
    background-color: var(--color-gray-300);
    transform: translateY(-2px);
}

/* Responsividade */
@media (max-width: 480px) {
    .form-container {
        padding: 20px;
    }

    .form-grid {
        grid-template-columns: 1fr;
    }

    .button-group {
        flex-direction: column-reverse;
    }

    button {
        width: 100%;
        justify-content: center;
    }
}