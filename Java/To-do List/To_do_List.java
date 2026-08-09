import java.util.ArrayList;

public class TodoList {
    private ArrayList<Task> tasks = new ArrayList<>();

    public void addTask(String title) {
        tasks.add(new Task(title));
        System.out.println("Tugas berhasil ditambahkan.");
    }

    public void showTasks() {
        if (tasks.isEmpty()) {
            System.out.println("Belum ada tugas.");
            return;
        }

        System.out.println("\n=== DAFTAR TUGAS ===");

        for (int i = 0; i < tasks.size(); i++) {
            System.out.println((i + 1) + ". " + tasks.get(i));
        }
    }

    public void completeTask(int index) {
        if (index >= 0 && index < tasks.size()) {
            tasks.get(index).complete();
            System.out.println("Tugas selesai.");
        } else {
            System.out.println("Nomor tugas tidak ditemukan.");
        }
    }

    public void deleteTask(int index) {
        if (index >= 0 && index < tasks.size()) {
            tasks.remove(index);
            System.out.println("Tugas berhasil dihapus.");
        } else {
            System.out.println("Nomor tugas tidak ditemukan.");
        }
    }
}