import 'dart:convert';
import 'package:http/http.dart' as http;
import '../models/Task.dart';
import 'package:gesty/config/config.dart';

class TaskApiService {
  static Future<List<Task>?> getTasks(int projectId) async {
    final response = await http.post(
      Uri.parse('$base_url/tasks'),
      headers: headers,
      body: jsonEncode(<String, String>{
        'project_id': projectId.toString(),
      }),
    );
    print("DEBUG JSON: ${response.statusCode} - ${response.body}");
    if (response.statusCode == 200) {
      print("DEBUG TASK: $projectId");
      if (response.body.toString().isNotEmpty) {
        Map<String, dynamic> parsedMap = json.decode(response.body);
        if (parsedMap.isNotEmpty) {
          List<Task> taskList = [];
          parsedMap.forEach((key, value) {
            taskList.add(Task.fromJson(value));
          });
          return taskList;
        } else {
          return null;
        }
      } else {
        return null;
      }
    } else {
      throw Exception(response.body);
    }
  }
}
