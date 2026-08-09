import java.util.Scanner;

public class Main {
    public static void main(String[] args) {

        Scanner scanner = new Scanner(System.in);
        TodoList todoList = new TodoList();

        while (true) {
            System.out.println("\n======================");
            System.out.println("     JAVA TODO LIST");
            System.out.println("======================");
            System.out.println("1. Tambah Tugas");
            System.out.println("2. Lihat Tugas");
            System.out.println("3. Tandai Selesai");
            System.out.println("4. Hapus Tugas");
            System.out.println("5. Keluar");
            System.out.print("Pilih menu: ");

            int pilihan = scanner.nextInt();
            scanner.nextLine();

            switch (pilihan) {
                case 1:
                    System.out.print("Masukkan tugas: ");
                    String tugas = scanner.nextLine();
                    todoList.addTask(tugas);
                    break;

                case 2:
                    todoList.showTasks();
                    break;

                case 3:
                    todoList.showTasks();
                    System.out.print("Nomor tugas yang selesai: ");
                    int selesai = scanner.nextInt();
                    todoList.completeTask(selesai - 1);
                    break;

                case 4:
                    todoList.showTasks();
                    System.out.print("Nomor tugas yang dihapus: ");
                    int hapus = scanner.nextInt();
                    todoList.deleteTask(hapus - 1);
                    break;

                case 5:
                    System.out.println("Program selesai.");
                    scanner.close();
                    return;

                default:
                    System.out.println("Pilihan tidak tersedia.");
            }
        }
    }
}