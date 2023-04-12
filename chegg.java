import java.util.*;

public class chegg {
    public static void main(String[] args) {
        
        ArrayList myList = new ArrayList<>();
        myList.add("C");
        myList.add("H");

        ArrayList myList2 = new ArrayList<>();
        myList2.add("C");
        myList2.add(1,"H");
        System.out.println(myList.equals(myList2));
    }
}
